<div class="my-5 d-flex justify-content-center w-100">
    <section class="border border-1 border-dark rounded-0 p-3 col-lg-6 col-10 auto bg-gray-300">
        <h1 class="text-center text-3xl my-2">Rejestracja</h1>
        <hr>
        <form class="my-3" wire:submit.prevent="submit">
            <div class="d-flex justify-content-around my-4"> 
                <div class="d-flex flex-wrap col-10">
                    <input type="name" class="form-control p-2 rounded-1 border border-1 shadow-sm w-100" 
                            wire:model="form.name" placeholder="Nazwa użytkownika" />
                    @error('form.name') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="d-flex justify-content-around my-4">
                <div class="d-flex flex-wrap col-10">
                    <input type="email" class="form-control p-2 rounded-1 border border-1 shadow-sm w-100" 
                        placeholder="Email" wire:model="form.email" />
                    @error('form.email') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="d-flex justify-content-around my-4">
                <div class="d-flex flex-wrap col-10">
                    <input type="password" class="form-control p-2 rounded-1 border border-1 shadow-sm w-100" 
                            placeholder="Hasło" wire:model="form.password" />
                    @error('form.password') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="d-flex justify-content-around my-4">
                <div class="d-flex flex-wrap col-10">
                    <input type="text" class="form-control p-2 rounded-1 border border-1 shadow-sm w-100" placeholder="Confirm Password"
                        wire:model="form.password_confirmation" />
                </div>
            </div>
            <div class="d-flex justify-content-around my-4">
                <div class="d-flex flex-wrap col-10">
                    <input type="submit" value="Zarejestruj użytkownika"
                        class="p-2 btn btn-primary text-white w-100 rounded-1 tracking-wider cursor-pointer" />
                </div>
            </div>
        </form>
    </section>
</div>
