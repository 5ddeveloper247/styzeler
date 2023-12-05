<!-- log.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styzler__Log Viewer</title>
</head>
<body>
    <h1>Styzler Cron_____Log Viewer</h1>
    <h2 style="color:red">Guide to look into Logs:</h2>
    <h2 style="color:rgb(220, 20, 160)">Cron only cancel the booking whose difference time is less than 12 hours</h2>
    <h3>Look into the end of the file for latest log each log started with start time(latest time) when it stated and end time when it ended, Btw these red and green text what cron does it list here <b style="color:red">checkOnHold function started</b><b style="color:green">checkOnHold function finishe</b></h3>
    <pre>{{ $logContent }}</pre>
   
</body>
</html>
<script>
    // Function to scroll the page to the bottom
    function scrollPageToBottom() {
        // Scroll to the total height of the document
        window.scrollTo(0, document.body.scrollHeight);
    }

    // Attach the function to the window.onload event
    window.onload = scrollPageToBottom;
</script>