function initSigninV2() {

}


function onSignIn(googleUser) {
    let profile = googleUser.getBasicProfile();
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

    var name = profile.getName();
    var email = profile.getEmail();
    var picture = profile.getImageUrl();
    var data = "name=" + name + "&email=" + email + "&picture=" + picture;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/login/google", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(data);
    xhr.onreadystatechange = (e) => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            location.href = window.location.origin + `/panel`;
        }
    }

}

function onLoad() {
    gapi.load('auth2', function() {
        gapi.auth2.init();
    });
}

function onSignOut() {
    gapi.auth2.init();
    gapi.auth2.getAuthInstance().signOut();
    location.href = window.location.origin + `/home`;

}