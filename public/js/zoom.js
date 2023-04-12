const workspace = document.querySelector('.workspace');
const zoomSpeed = 0.1;

let zoom = 1;

document.addEventListener('wheel', function (e) {

    if (e.deltaY > 0) {

        document.querySelector('.workspace').style.transform = `scale(${(zoom += zoomSpeed)})`;

    } else {

        document.querySelector('.workspace').style.transform = `scale(${(zoom -= zoomSpeed)})`;

    }

});