const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";


console.log( localStorage.getItem('ISADMACTIVE'));
if(localStorage.getItem('ISADMACTIVE') == "Yes") {
    localStorage.setItem('ISADMACTIVE', null);
    window.location.href = "../index.html";
}