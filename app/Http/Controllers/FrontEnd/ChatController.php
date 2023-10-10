<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Chat;
use App\Models\Chat_reply;
use App\Models\Guest_user;
use Illuminate\Http\Request;
use App\Models\Chat_questions;
use App\Events\EmailSendingEvent;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuestUserValidationRequest;
use App\Http\Requests\ChatQuestionValidationRequest;

class ChatController extends Controller
{
    public function saveGuestUserDetails(GuestUserValidationRequest $request)
    {

        $existing = Guest_user::where('email', $request->email)->first();

        if (!isset($existing->id)) {

            $guest_user = new Guest_user();
            $guest_user->name = $request->username;
            $guest_user->email = $request->email;
            $guest_user->phone = $request->phone;
            $guest_user->date = date('Y-m-d');

            $guest_user->save();

            $id = $guest_user->id;
        } else {
            $id = $existing->id;
        }

        $arrRes['id'] = $id;
        $arrRes['questions'] = Chat_questions::where('status', 'active')->get();

        return response()->json(['status' => 200, 'message' => 'Details submitted Succsessfully!', 'data' => $arrRes]);
    }

    public function sendMessage(Request $request)
    {

        $msgType = isset($request->msg_type) ? $request->msg_type : '';
        $guestUserId = $request->guest_userid;
        $message = $request->message;

        $existing = Guest_user::where('id', $request->guest_userid)->first();

        if ($msgType == 'other') {

            $chat = new Chat();

            $chat->guest_user_id = $guestUserId;
            $chat->question = $message;
            $chat->type = 'other';
            $chat->date = date('Y-m-d');
            $chat->save();

            $sending_email_to = [$existing->email, 'admin@styzeler.co.uk'];

            foreach ($sending_email_to as $email) {
                if ($email == 'admin@styzeler.co.uk') {
                    $body = "<h4>Chat Notification !</h4><br>
                            <h5>Dear Admin !</h5><br>
                        <p>You Received a Question via Email From <b>$existing->name</b>, Please Reply to the Question as soon as possible.<br>Thank you !</p>";
                    $email_send_to = $email;
                    $email_for = "Chat Received";
                    $email_subject = "Chat Email Received !";
                } else {
                    $body = "<h4>Chat Notification !</h4>
                        <h5>Dear $existing->name !</h5>
                        <p>Your Question is Successfully Send to Admin, Please Wait for the Reply.<br>Thank you !</p>";
                    $email_send_to = $email;
                    $email_for = "Chat Sent";
                    $email_subject = "Chat Email Sent !";
                }

                $body .= "<table>
                <tr>
                    <td>Name:</td>
                    <td>$existing->name</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>$existing->email</td>
                </tr>
                <tr>
                    <td>Question:</td>
                    <td>$message</td>
                </tr>
                </table>";

                sendMail($existing->name, $email_send_to, $email_for, $email_subject, $body);
            }
            return response()->json(
                [
                    'data' => 'Your question sent to admin, we will get back to you...',
                    'type' => $msgType,
                    'status' => 200
                ]
            );
        } else {

            $questions = Chat_questions::where('status', 'active')->get();

            return response()->json(
                [
                    'data' => $questions,
                    'type' => $msgType,
                    'status' => 200
                ]
            );
        }
    }
    public function getAnswer(Request $request)
    {

        if (isset($request->id)) {

            $specificQuestion = Chat_questions::where('id', $request->id)->first();

            return response()->json(
                [
                    'data' => $specificQuestion,
                    'status' => 200
                ]
            );
        } else {
            return response()->json(['data' => '', 'status' => 500]);
        }
    }

    public function saveChatQuestionDetails(ChatQuestionValidationRequest $request)
    {

        if (isset($request->question_id) && $request->question_id != '') {

            $chat_questions = Chat_questions::find($request->question_id);

            $chat_questions->question = $request->chat_question;
            $chat_questions->answer = $request->chat_answer;

            $chat_questions->update();
        } else {

            $chat_questions = new Chat_questions();

            $chat_questions->question = $request->chat_question;
            $chat_questions->answer = $request->chat_answer;
            $chat_questions->status = 'active';
            $chat_questions->date = date('Y-m-d');

            $chat_questions->save();
        }

        return response()->json(['status' => 200, 'message' => 'Question details submitted Succsessfully!', 'data' => '']);
    }

    public function getChatQuestiondetail(Request $request)
    {

        if (isset($request->id)) {
            $data = Chat_questions::where('id', $request->id)->first();
            return response()->json(
                [
                    'data' => $data,
                    'status' => 200
                ]
            );
        } else {
            return abort(404);
        }
    }

    public function changeQuestionStatusActive(Request $request, $id = '')
    {
        if ($id != '') {
            $rent_let = Chat_questions::find($id);
            $rent_let->status = 'active';
            $rent_let->update();
            session()->flash('success', 'Question Activated Successfully!');
            return redirect()->back();
        } else {
            return abort(404);
        }
    }
    public function changeQuestionStatusInActive(Request $request, $id = '')
    {
        if ($id != '') {
            $rent_let = Chat_questions::find($id);
            $rent_let->status = 'inactive';
            $rent_let->update();
            session()->flash('success', 'Question Deactivated Successfully!!');
            return redirect()->back();
        } else {
            return abort(404);
        }
    }

    public function getFaqQuestiondetail(Request $request)
    {

        if (isset($request->id)) {
            $data = Chat::where('id', $request->id)->first();
            $replies = Chat_reply::where('chat_id', $request->id)->get();
            return response()->json(
                [
                    'chat' => $data,
                    'replies' => $replies,
                    'status' => 200
                ]
            );
        } else {
            return abort(404);
        }
    }

    public function saveChatReplyDetails(Request $request)
    {
        $chat_reply = new Chat_reply();
        $guest_user = Chat::where('id', $request->chat_id)->with('chat_guest_user')->first();

        $chat_reply->chat_id = $request->chat_id;
        $chat_reply->reply = $request->chat_reply;

        $chat_reply->save();
        $body = "<h4>Chat Notification !</h4><br>
                    <h5>Dear $guest_user->chat_guest_user->name !</h5><br>
                       <p>This Email is Reply to Your Question<br>Thank you !</p><br>
                    <table>
					    <tr>
						    <td>Question:" . $guest_user->question . " </td>
					    </tr>
					    <tr>
						    <td>Answer:" . $request->chat_reply . "</td>
					    </tr>
				    </table>";

        $sendEmail = [$guest_user->chat_guest_user->email];

        sendMail($guest_user->chat_guest_user->name, $sendEmail, 'Chat Reply', 'Chat Email', $body);
        return response()->json(['status' => 200, 'message' => 'Question details submitted Succsessfully!', 'data' => '']);
    }
}
