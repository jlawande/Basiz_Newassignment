<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Todo List</h3>
<input id="task" class="form-control mb-2" placeholder="Enter task">
<button onclick="addTodo()" class="btn btn-success mb-3">Add</button>

<ul id="todoList" class="list-group"></ul>

<script>
let todos = [];

function addTodo(){
    let task = document.getElementById("task").value;
    todos.push({text:task, done:false});
    render();
}

function render(){
    let html="";
    todos.forEach((t,i)=>{
        html+=`
        <li class="list-group-item">
            <span style="text-decoration:${t.done?'line-through':'none'}">${t.text}</span>
            <button onclick="edit(${i})">Edit</button>
            <button onclick="del(${i})">Delete</button>
            <button onclick="complete(${i})">Complete</button>
        </li>`;
    });
    document.getElementById("todoList").innerHTML=html;
}

function edit(i){
    let val = prompt("Edit Task", todos[i].text);
    todos[i].text = val;
    render();
}
function del(i){
    todos.splice(i,1);
    render();
}
function complete(i){
    todos[i].done=true;
    render();
}
</script>
</body>
</html>
