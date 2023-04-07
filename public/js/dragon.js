// get the ul
let dragonList = document.getElementById('dragon-list');

// data
let data = [];
let listItems = [];

let dragStartIndex;


//


// createList();

// function createList() {
//     [...data].forEach((person, index) => {

//         // the id of the li MUST be associated to the data records ID!!!!
//         const listItem = document.createElement('li');
//         listItem.setAttribute('id', index);

//         listItem.innerHTML = `
//             <div class="draggable" draggable="true">
//                 <h6>Some Title</h6>
//                 <p class="person-name">${person}</p>
//                 <i class="fas fa-grip-lines"></i>
//             </div>
//         `;

//         // <a href="#" class="btn btn-dark">Edit</a>

//         listItems.push(listItem);

//         dragonList.appendChild(listItem);
//     });

//     addEventListeners();
// }

//

function OnPageLoad($data) {
    SetData($data);
    SetListItems();
    addEventListeners();
}

function SetListItems() {
    listItems = document.querySelectorAll('.draggable');
}

function SetData($data) {
    data = $data;
}

// get the index of the selected li that is being dragged somewhere 
function dragStart(event) {
    dragStartIndex = +this.closest('li').getAttribute('id');
    this.classList.add('dragging');
    console.log(this.classList);
}

function dragEnter() {
    this.classList.add('over');
}

function dragLeave() {
    this.classList.remove('over');
}

function dragOver(e) {
    e.preventDefault();
}

function dragDrop(event) {
    console.log('dragDrop');
    console.log(event);
    // get the index of the li that we are currently hovering over
    const dragEndIndex = +this.getAttribute('id');
    swapItems(dragStartIndex, dragEndIndex);

    this.classList.remove('over');
}

function dragEnd() {
    //
}

function swapItems(dragStartIndex, dragEndIndex) {

    // to swap the li contents instead of moving the li:
    // const selectedListItemContentsToMove = listItems[dragStartIndex].querySelector('.draggable');
    // const targetedListItemContentsToDropOn = listItems[dragEndIndex].querySelector('.draggable');
    // listItems[dragStartIndex].appendChild(targetedListItemContentsToDropOn);
    // listItems[dragEndIndex].appendChild(selectedListItemContentsToMove);

    // to actually move the li:
    const selectedListItemToMove = listItems[dragStartIndex];
    const targetedListItemToDropOn = listItems[dragEndIndex];
    dragonList.insertBefore(selectedListItemToMove, targetedListItemToDropOn);

    for (var item of document.querySelectorAll('.dragging')) {
        item.classList.remove('dragging');
    }
}

function addEventListeners() {
    const draggables = document.querySelectorAll('.draggable');
    const dragListItems = document.querySelectorAll('.draggable-list li');

    draggables.forEach(draggable => {
        draggable.addEventListener('dragstart', dragStart);
    });

    dragListItems.forEach(item => {
        item.addEventListener('dragover', dragOver);
        item.addEventListener('drop', dragDrop);
        item.addEventListener('dragenter', dragEnter);
        item.addEventListener('dragleave', dragLeave);
        item.addEventListener('dragend', dragEnd);
    });
}