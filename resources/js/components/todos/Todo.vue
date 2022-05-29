<template>

<div class="title">TODO APP</div>

<div class="card">
  
    <div class="italic text-2xl font-extrabold text-center m-5">Welcome Back <span class="text-2xl font-thin">{{userName}} </span></div>
    <div class="add">

     <div v-show="showAdd">
        <input type="text" class="addInput" :placeholder="placeHolder" @keyup.enter="insert" v-model="newTodo" />
        <button class="addBtn btn-primary" @click="insertTodo"><i class="fa-solid fa-plus"></i> Add Todo</button>
      </div>

      <div v-show="showUpdate">
        <input type="text" class="addInput" v-model="upTodo" />
        <button @click="editTodo" class="addBtn btn-secondary hover:bg-gradient-to-l hover:from-lime-400 hover:to-lime-600"><i class="fa-solid fa-pen-to-square"></i> Save </button>
      </div>
    </div>
    <table class="table-auto w-full" v-if="todos.length>0">
      <thead>
        <tr>
          <th>#</th>
          <th>To Do</th>
          <th>Status</th>
          <!-- <th>Date</th> -->
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <template v-for="({ id, todo, status, updated_at }, index) in todos" :key="index">
          <tr>
              
            <td>{{ index + 1 }}</td>
            <td>{{ todo }}</td>
            <td>
              <label class="relative">
                <input type="checkbox" :checked="status" @change="toggleStatus(id,status)" class="sr-only toggle peer"/>
                <span class="switch"></span>
              </label>
            </td>
            <!-- <td>{{updated_at}}</td> -->
            <td>
              <button class="btn btn-secondary" :disabled="!status" @click="updateShow(id,todo)">Edit</button>
              <button class="btn btn-danger" :disabled="!status"  @click="deleteTodo(id)">Delete</button>  
            </td>
          </tr>
        </template>
      </tbody>
    </table>
    <div class="text-xl text-slate-600 font-semibold text-center" v-else>
      Not Currently Any Todo
    </div>
  </div>


</template>

<script>
import useTodos from '../scripts/todo'
import { onMounted, ref } from 'vue'
   export default {
       setup() {
         
           const {todos, getTodos, destroyTodo, createTodo, updateTodo} = useTodos()
            
            const newTodo=ref()
            const upTodo=ref()
            const placeHolder=ref(null)
            const showAdd=ref(true)
            const showUpdate=ref(false)
            const todoid=ref()

            const userName=ref(window.Laravel.name)
            
            onMounted(getTodos())

            const deleteTodo =  (id) => {
                if(!window.confirm('Are You Sure?'))
                {
                    return
                }
                 destroyTodo(id);
            }

            const insertTodo = () => {
              try {
                createTodo({todo:newTodo.value})
                newTodo.value=""
              } catch (error) {
                placeHolder.value="Please fill the input"
              }
                  
            }

            const toggleStatus =  (id,status) => {
                console.log('test')
                console.log(status)
                status=!status
                updateTodo(id,{status:status})
            }

            const updateShow = (id,todo) =>{
              showAdd.value=false;
              showUpdate.value=true;
              todoid.value=id
              upTodo.value=todo
              window.scrollTo({top: 0, behavior: 'smooth'});
            }

            const editTodo = () =>{
              updateTodo(todoid.value,{todo:upTodo.value})
              showAdd.value=true
              showUpdate.value=false
            }

           return {
               todos, 
               deleteTodo, 
               insertTodo, 
               newTodo, 
               toggleStatus, 
               placeHolder,
               showAdd,
               showUpdate,
               upTodo,
               updateShow,
               userName,
               editTodo
           }
       }
   }
</script>