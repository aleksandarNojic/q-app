<x-layout>
    <form method="POST" action="/signin">
        @csrf
        <div>
            <label class="text-gray-200" for="email">EMAIL</label>
            <input type="email" id="email" name="email" placeholder="enter email">
        </div>
        @error('email')
            <p class="text-error text-lg">
                {{ $message }}
            </p>
        @enderror

        <div class="mt-2">
            <label class="text-gray-200" for="password">PASSWORD</label>
            <input type="password" id="password" name="password" placeholder="enter password">
        </div>
        @error('password')
            <p class="text-error text-lg">
                {{ $message }}
            </p>
        @enderror
        <button type="submit">SIGNIN</button>
    </form>
</x-layout>
