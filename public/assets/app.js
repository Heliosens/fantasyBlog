let error = document.getElementById('error');

if(error) {
    setTimeout(()=>error.remove(), 5000);
}

document.querySelector('section').style.minHeight = innerHeight * 0.85 + "px";