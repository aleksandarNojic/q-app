<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        table,
        th,
        td {
            border: 1px solid #edf2f7;
            border-collapse: collapse;
            padding: 6px
        }

        table th {
            color: #e6db13
        }

        .bg-gray-900 {
            --bg-opacity: 1;
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--bg-opacity))
        }

        .bg-error {
            --bg-opacity: 0.4;
            background-color: #a12a12;
            background-color: rgba(161, 42, 18, var(--bg-opacity))
        }

        .bg-success {
            --bg-opacity: 0.4;
            background-color: #7ed841;
            background-color: rgba(126, 216, 65, var(--bg-opacity))
        }

        .flex {
            display: flex
        }

        .block {
            display: block
        }

        .grid {
            display: grid
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .justify-column {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-yellow {
            color: #e6db13;
        }

        .text-error {
            color: #e02006;
        }

        .text-success {
            color: #27f008;
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            --bg-opacity: 1;
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--bg-opacity))
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .justify-center {
            justify-content: center
        }

        .min-h-screen {
            min-height: 100vh
        }

        form input,
        select,
        button {
            padding: 8px;
            display: block;
            margin: 10px 4px 10px 4px
        }

    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased">
    <div>
        <nav>
            @if (session()->exists('token_key'))
                <div class="text-gray-200 text-lg flex items-center px-6">
                    <p>{{ session('user') }}</p>
                    <a class="ml-4 text-yellow font-semibold" href="/logout">Logout</a>
                    @if (!Route::is('books'))
                        <a class="ml-4" href="/books">ADD NEW BOOK</a>
                    @endif
                    @if (!Route::is('authors'))
                        <a class="ml-4" href="/authors">All Authors</a>
                    @endif
                </div>
            @endif
        </nav>
        <header>
            @if (session()->exists('error'))
                <div class="bg-error text-error text-lg flex items-center px-6 font-semibold">
                    <p>{{ session('error') }}</p>
                </div>
            @endif
            @if (session()->exists('success'))
                <div class="bg-success text-success text-lg flex items-center px-6 font-semibold">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
        </header>
        <main class="relative flex text-gray-200 items-center min-h-screen justify-center bg-gray-900 full-height">
            {{ $slot }}
        </main>
    </div>

</body>

</html>
