var textarea = document.querySelector('textarea');
var counter = document.getElementById('counter');
counter.innerText = textarea.value.length + " / 2,000";

textarea.addEventListener("input", function () {

    var maxLength = this.getAttribute("maxlength");
    var currentLength = this.value.length;

    counter.innerText = currentLength + " / 2,000";

});