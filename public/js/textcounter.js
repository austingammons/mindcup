var textarea = document.querySelector('textarea');
var counter = document.getElementById('counter');
counter.innerText = textarea.getAttribute('maxlength') - textarea.value.length + " / 2,000";

textarea.addEventListener("input", function () {

    var maxLength = this.getAttribute("maxlength");
    var currentLength = this.value.length;

    counter.innerText = maxLength - currentLength + " / 2,000";

});