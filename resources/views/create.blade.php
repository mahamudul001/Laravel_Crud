<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Record</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Dark theme customization */
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        .bg-dark {
            background-color: #1f1f1f;
        }

        .text-light {
            color: #e0e0e0;
        }

        .bg-dark-gradient {
            background: linear-gradient(145deg, #2a2a2a, #191919);
        }

        .shadow-dark {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
        }

        .shadow-dark-lg {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.8);
        }

        .input-dark {
            background-color: #333;
            border: 1px solid #444;
            color: #e0e0e0;
        }

        .input-dark::placeholder {
            color: #888;
        }

        .btn-gradient {
            background: linear-gradient(45deg, #6a5acd, #ff6347);
            transition: background 0.5s ease;
        }

        .btn-gradient:hover {
            background: linear-gradient(45deg, #ff6347, #6a5acd);
        }

        .btn-shadow {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-shadow:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <!-- Container -->
    <div class="w-full max-w-lg mx-auto bg-dark-gradient rounded-lg shadow-dark-lg p-8">

        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-3xl font-extrabold text-light text-center">Create New Record</h1>
        </header>

        @if ($errors->any())

        <div class=" bg-red-100 border border-red-400 text-red-700 px-4 py-3 reounded-lg mb-6 ">
            <ul class=" list-disc list-inside ">
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
            
        @endif

        <!-- Form -->
        <form action="/" method="POST">
            @csrf
            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-light">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" class="mt-1 block w-full rounded-md input-dark p-3" required>
            </div>

            <!-- Email Field -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-light">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" class="mt-1 block w-full rounded-md input-dark p-3" required>
            </div>

            <!-- Age Field -->
            <div class="mb-6">
                <label for="age" class="block text-sm font-medium text-light">Age</label>
                <input type="number" id="age" name="age" placeholder="Enter your age" min="0" max="120" class="mt-1 block w-full rounded-md input-dark p-3" >
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn-gradient btn-shadow text-white font-bold py-3 px-8 rounded-full shadow-xl transform hover:scale-105 transition-transform duration-300">
                    Create Record
                </button>
            </div>
        </form>
    </div>

</body>
</html>
