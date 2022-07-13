function hidepreloader(){
    preloader = document.getElementById('preloaderId');
    preloader.style.display = "none";
}
function showpreloader(){
    preloader = document.getElementById('preloaderId');
    preloader.style.display = "block";
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
