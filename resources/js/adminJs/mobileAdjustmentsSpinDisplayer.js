function createTableEntry(data){
    let table = document.getElementById("entriesTableBody");
    let row = table.insertRow(data.index);
    row.classList.add("entryRow");
    let cell1 = row.insertCell(0);
    let cell2 = row.insertCell(1);
    let cell3 = row.insertCell(2);
    let plus = document.createElement("i");
    plus.classList.add("las");
    plus.classList.add("la-plus");
    plus.classList.add("actionInTable");
    cell1.appendChild(plus);
    cell1.appendChild(document.createTextNode(checkLenght(data.text)));
    cell2.innerHTML = data.prize;
    let btn = document.createElement("button");
    btn.classList.add("actionButton");
    let icon = document.createElement("i");
    icon.classList.add("las");
    icon.classList.add("la-trash");
    icon.classList.add("icon");
    icon.classList.add("actionInTable");
    icon.classList.add("Bad");
    btn.appendChild(icon);
    cell3.appendChild(btn);
    //cell3.innerHTML = <button class="btn"><i class="las la-trash icon Bad"></i></button>;
}

let newEntries = []

function checkLenght(toCheck){
    if(toCheck.length > 15){
        return toCheck.substring(0, 15) + "...";
    }
    return toCheck;
}

document.getElementById("addEntryBtn").addEventListener("click", function(){
    let text = document.getElementById("text").value;
    let prize = document.getElementById("discount").value;
    if(text == "" || prize == ""){
        alert("Please fill in all fields");
        return;
    }
    let data = {
        text: text,
        prize: prize,
        id : newEntries.length
    };

    newEntries.push(data);
    createTableEntry(data);
    document.getElementById("text").value = "";
    document.getElementById("discount").value = "";
});

document.getElementById("confirmSpinOptions").addEventListener("click", function(){

    window.axios.post("/admin/dailySpin/add", {
        entries: newEntries
    }).then(function(response){
        console.log(response);
        //window.location.reload();
    })

});