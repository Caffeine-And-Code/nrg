function createClassElement(newClass){
    let li = document.createElement('li');
    li.classList.add('d-flex');
    li.classList.add('justify-content-between');
    li.classList.add('align-items-center');

    let className = document.createElement('h3');
    className.classList.add('smallTitle');
    let strong = document.createElement('strong');
    strong.textContent = newClass.name;
    className.appendChild(strong);

    let button = document.createElement('button');
    button.classList.add('btn');
    button.setAttribute("id", "deleteClassroomBtn");

    let i = document.createElement('i');
    i.classList.add('las');
    i.classList.add('la-trash');
    i.classList.add('Bad');
    button.appendChild(i);

    button.addEventListener('click', function(){
        li.remove();
        classes = classes.filter((classroom) => classroom.id !== newClass.id);
    });

    li.appendChild(className);
    li.appendChild(button);

    document.getElementById('classList').appendChild(li);
}

let classes = [];

document.getElementById("addClassroomBtn").addEventListener('click', function(){
    let newClass = {
        name: document.getElementById('classNumber').value,
        id: classes.length
    };

    classes.push(newClass);

    createClassElement(newClass);
});

document.getElementById("confirmClasses").addEventListener('click', function(){
    window.axios.post('/admin/classrooms/add', {
        classes: classes
    }).then((response) => {
        window.location.reload();
    }).catch((error) => {
        console.log(error);
    })   
});