
let userInput = document.getElementById ('user-input');
let btn = document.getElementById ('user-input-submit');
let itemList = document.getElementById('item-list');
let items = document.getElementsByClassName ('item');
let removeBtns = document.getElementsByClassName('remove-btn');

let preloader = document.getElementById ('preloader');


//console.log(btn);

init();

function init() {
    btn.addEventListener( 'click', addItem);
    for (let i = 0; i < removeBtns.length; i++) {
        removeBtns[i].addEventListener( 'click', removeItem);
        
    }
    
}


//add item to a fake basket

function addItem() {
    let inputValue = userInput.value;
    preloader.classList.add('loading');

    // Simulation of the Add Item in Basket 
    try {
        if ( inputValue > 0) {
            var item = document.createElement('li');
        
            // fake item
            item.appendChild(document.createTextNode(inputValue + 'item/s'));
            
            // attributes of the fake item
            item.setAttribute ('class', 'item animate');
            
            //add remove item button
            let removeBtn = document.createElement('div');
            removeBtn.setAttribute('class' , 'remove-btn');
            removeBtn.appendChild(document.createTextNode('x'));

            // add functionality og remove item
            removeBtn.addEventListener( 'click', removeItem );
            item.appendChild(removeBtn);
            itemList.appendChild(item);
            
            // add animation of new item
            setTimeout(() => {
                item.classList.remove('animate');
            }, 1600);
            // reset reset of input item
            userInput.value = 0;

        } else {
            throw new Error('Add an Item');
        }

    } catch (error) {
        alert (error.message);
        
    } finally {
        setTimeout(function () {
            preloader.classList.remove('loading');
        }, 1500 );
    }
    
}

function removeItem( event ) {
    let parentItem = event.target.parentNode
    parentItem.remove();
}

