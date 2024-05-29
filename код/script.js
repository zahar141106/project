let btn1 = document.getElementById("index_header_nav_btn")
let popup1 = document.getElementById("index_popup")
btn1.addEventListener('click', () => { 
    popup1.style.display = "flex"
})
document.getElementById('btn_close').addEventListener('click', () => { 
    popup1.style.display = 'none'
})


const rooms = [
    { number: 101, type: 'presidential', price: 500, available: true, img: 'Rectangle 5.png' },
    { number: 102, type: 'standard', price: 100, available: true,  img: 'Rectangle 20.png' },
    { number: 103, type: 'luxury', price: 300, available: false, img: 'Rectangle 22.png' },
    { number: 104, type: 'suite', price: 200, available: true,img: 'Rectangle 25.png'},
    { number: 105, type: 'exclusive', price: 700, available: false, img: 'Rectangle 30.png' },
    { number: 106, type: 'exclusive', price: 650, available: true, img: 'Rectangle 31.png' }
    ];
    
    const filterSelect = document.getElementById('filter');
    const roomsContainer = document.getElementById('rooms');
    
    filterSelect.addEventListener('change', function() {
    const selectedValue = filterSelect.value;
    
    let filteredRooms = rooms;
    
    if (selectedValue === 'ascending') {
    filteredRooms = filteredRooms.sort((a, b) => a.price - b.price);
    } else if (selectedValue === 'descending') {
    filteredRooms = filteredRooms.sort((a, b) => b.price - a.price);
    } else if (selectedValue === 'available') {
    filteredRooms = filteredRooms.filter(room => room.available);
    } else {
    filteredRooms = filteredRooms.filter(room => room.type === selectedValue);
    }
    
    displayRooms(filteredRooms);
    });
    
    function displayRooms(rooms) {
    roomsContainer.innerHTML = '';
    
    rooms.forEach(room => {
    const roomDiv = document.createElement('div');
    roomDiv.innerHTML = `
     <section class='roomsJS'>
    
    <img src='${room.img}'></img>
    <article class='roomsTEXT'>
    <article class='roomsTEXT1'>
    <p>Номер:</p><p id='pNumber'>${room.number}</p>
    </article>
    <article class='roomsTEXT1'>
    <p>Тип:</p> <p id='pNumber'>${room.type}</p>
    </article>
    <article class='roomsTEXT1'>
    <p>Цена: </p><p id='pNumber'>${room.price} $</p>
    </article>
    <p>${room.available ? 'Свободен' : 'Занят'}</p>
    </article>
    <button class='buttonJS'>
    <article class='buttonBlack'>
    <p>Забронировать</p>
    <p id='buttonBlackLast'>→</p>
    </article>
    </button>
    
    </section>
    `;
    roomsContainer.appendChild(roomDiv);
    });
    }
    
    displayRooms(rooms);
    