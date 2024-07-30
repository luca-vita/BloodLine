const toggleButton = document.getElementsByClassName('topnav-toggle')[0];
const navbarLinks = document.getElementsByClassName('topnav-links');
toggleButton.addEventListener('click', function() {
    for (var i=0; i<navbarLinks.length; i++)
        navbarLinks[i].classList.toggle('active');
});

function showPopUp() {
    document.getElementById("popup").style.display = "block";
}

function closePopUp() {
    document.getElementById("popup").style.display = "none";
}

