<div x-data="{
    counter:0,
    decrement(){
        this.counter--
    },
    increment(){
        this.counter++
    },

}">
    <button @click="decrement" class="border rounded border-slate-500 p-4 hover:bg-slate-200">-</button>
    <span x-html="counter"></span>
    <button @click="increment" class="border rounded border-slate-500 p-4 hover:bg-slate-200">+</button>
</div>
