$('#register_modal, #fail-modal').on('show.bs.modal', function () {
    // Save the Current URL in local Storage
    let url = window.location.href;
    let lastSlashIndex = url.lastIndexOf('/');
    let urlAfterLastSlash = url.substring(lastSlashIndex + 1);

    $('.btn1.customBtn').click(function() {
        if ($(this).text() === 'Ok') {
            // check if url does not exist in Local Storage
            if(localStorage.getItem('redirectTo')){
                localStorage.removeItem('redirectTo');
            } 
            localStorage.setItem('redirectTo', urlAfterLastSlash);
        }
    });
}).on('hidden.bs.modal', function () {
    return false;
});
