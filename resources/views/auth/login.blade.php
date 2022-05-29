<x-guest-layout>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="shadow-teal-300 text-white shadow-xl p-16 my-52 mx-auto  sm:w-1/2 lg:w-2/6 justify-center duration-300 bg-slate-500 rounded-xl
                    hover:shadow-xl hover:shadow-teal-500">
            <div class="text-3xl my-10 text-center"> Welcome <span class="font-extrabold">Todo App</span></div>
            <div class="my-5 text-center">
                <input type="email" name="email" :value="old('email')" required placeholder="E Mail"
                class="text-lg p-2 bg-transparent outline-none border-b-2 focus:shadow-xl focus:border-teal-300 w-full" >
            </div>
            <div class="my-5 text-center">
                <input type="password"  type="password" name="password" required autocomplete="current-password" placeholder="Password"
                class="text-lg p-2 bg-transparent outline-none border-b-2 focus:shadow-xl focus:border-teal-300  w-full " >
            </div>

                <button type="submit" class="bg-slate-900 hover:bg-slate-700 duration-300 py-2 px-6 rounded-lg uppercase text-sm w-full my-5">
                    {{ __('Log in') }}
                </button>
                <div class="bg-slate-900 hover:bg-slate-700 duration-300 py-2 px-6 rounded-lg uppercase text-center text-sm w-full mb-5">
                    <a href="{{ route('register') }}" >Register</a> 
                </div>
        </form>
    
</x-guest-layout>
