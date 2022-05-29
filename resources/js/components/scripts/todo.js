import axios from "axios"
import { ref, vModelRadio } from "vue"

export default function useTodos(){
    const todos= ref([])
    const userId=ref(window.Laravel.id)
    
    
    const getTodos = async () => {
        let response= await axios.get('/api/todos/'+userId.value)
        todos.value=response.data.data;
    }

    const destroyTodo = async (id) => {
        await axios.delete('/api/todos/'+id)
        await getTodos()
    }

    const createTodo = async (data) => {
        await axios.post('/api/todos/'+userId.value,data)
        await getTodos()
    }

    const updateTodo = async (id,data) => {
        await axios.put('/api/todos/'+id,data)
        await getTodos()
    }

    return{
        todos,
        getTodos,
        destroyTodo,
        createTodo,
        updateTodo
    }


}