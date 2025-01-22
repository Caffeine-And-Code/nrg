function createTableEntry(data){
    let table = document.getElementById("entriesTableBody");
    let row = table.insertRow(data.index);
    row.classList.add("entryRow");
    let cell1 = row.insertCell(0);
    let cell2 = row.insertCell(1);
    let cell3 = row.insertCell(2);
    cell1.appendChild(document.createTextNode(data.text));
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
    cell3.classList.add("d-flex");
    cell3.classList.add("justify-content-end");
    cell3.classList.add("btnNewSpin");
    console.log(cell3)
    //cell3.innerHTML = <button class="btn"><i class="las la-trash icon Bad"></i></button>;

    btn.addEventListener("click", function(){
        row.remove();
        newEntries = newEntries.filter((entry) => entry.id !== data.id);
    });
}

let newEntries = []

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
        
        // Redirect to the settings page
        window.location.href = "/admin/settings";
    
    })

});