formElem.onsubmit = async (e) => {
        e.preventDefault();
    
        let response = await fetch('reg.php', {
          method: 'POST',
          body: new FormData(formElem)
        });
    
        let result = await response.json();
    
        alert(result.message);
    };



    let btn1 = document.getElementById("index_header_nav_btn")
    let popup1 = document.getElementById("index_popup")
btn1.addEventListener('click', () => { 
    popup1.style.display = "flex"
})
document.getElementById('btn_close').addEventListener('click', () => { 
    popup1.style.display = 'none'   
})


const rooms = [
    { number: 101, type: 'presidential', price: 500, available: true, img: 'Rectangle 5.png', room: "Suite with ocean view" },
    { number: 102, type: 'standard', price: 350, available: true,  img: 'Rectangle 20.png', room: "King room with city view" },
    { number: 103, type: 'luxury', price: 250, available: false, img: 'Rectangle 22.png', room: "Double room with pool view" },
    { number: 104, type: 'suite', price: 200, available: true,img: 'Rectangle 25.png', room: "Standard room with garden view"},
    { number: 105, type: 'exclusive', price: 1000, available: false, img: 'Rectangle 30.png', room: "Presidential suite" },
    { number: 106, type: 'exclusive', price: 300, available: true, img: 'Rectangle 31.png', room: "Deluxe room with balcony" }
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
     <section class='roomsJS' >
    
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
    
    document.getElementById("buttonJS").addEventListener('click', () => { 
        alert('Функция бронирования в стадии разработки')
    })