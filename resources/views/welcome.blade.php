<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom animations */
        @keyframes button-hover {
            0% {
                transform: translateY(0);
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            }
            50% {
                transform: translateY(-5px);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            }
            100% {
                transform: translateY(0);
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            }
        }

        .btn-hover {
            transition: all 0.4s ease;
        }

        .btn-hover:hover {
            animation: button-hover 0.4s ease-in-out;
        }

        .btn-gradient {
            background: linear-gradient(45deg, #6a5acd, #ff6347);
            transition: background 0.5s ease;
        }

        .btn-gradient:hover {
            background: linear-gradient(45deg, #ff6347, #6a5acd);
        }

        .btn-gradient-edit {
            background: linear-gradient(45deg, #32cd32, #1e90ff);
            transition: background 0.5s ease;
        }

        .btn-gradient-edit:hover {
            background: linear-gradient(45deg, #1e90ff, #32cd32);
        }

        .btn-shadow {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-shadow:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        /* Customized dark theme */
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

        .table-header {
            background-color: #333;
        }

        .table-row:hover {
            background-color: #2a2a2a;
        }

        .table-row:nth-child(even) {
            background-color: #1e1e1e;
        }

        .shadow-dark {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
        }

        .shadow-dark-lg {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.8);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <!-- Container -->
    <div class="w-full max-w-6xl mx-auto bg-dark-gradient rounded-lg shadow-dark-lg overflow-hidden">

        <!-- Header -->
        <header class="bg-dark-gradient text-light py-8 px-8">
            <h1 class="text-4xl font-extrabold tracking-wide">Manage Your Records</h1>
            <p class="mt-2 text-lg font-medium">Effortlessly manage your data with our elegant and user-friendly interface</p>
        </header>

        <!-- Main Content -->
        <main class="p-10">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Record List</h2>

                <a href="{{ route('create') }}">
                    <button class="btn-hover btn-gradient text-white font-bold py-3 px-8 rounded-full shadow-xl transform hover:scale-105 transition-transform duration-300">
                        + Add New Record
                    </button>
                </a>
            </div>

            <!-- Table -->
            <div class="bg-dark rounded-lg shadow-dark overflow-hidden">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="table-header text-gray-300 text-sm leading-normal">
                            <th class="py-4 px-6 text-left">ID</th>
                            <th class="py-4 px-6 text-left">Name</th>
                            <th class="py-4 px-6 text-center">Email</th>
                            <th class="py-4 px-6 text-center">Age</th>
                            <th class="py-4 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300 text-sm">

                        @foreach ($students as $student)
                        <tr class="table-row border-b border-gray-600 transition-colors duration-150">
                            <td class="py-4 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{ $loop->iteration }}</span>
                            </td>
                            <td class="py-4 px-6 text-left">
                                <span>{{ $student->name }}</span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <span>{{ $student->email }}</span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <span>{{ $student->age }}</span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex item-center justify-center space-x-4">
                                    <!-- Edit Button -->
                                    <a href="{{ route('edit', $student->id) }}">
                                        <button class="btn-hover btn-gradient-edit text-white font-bold py-2 px-6 rounded-full shadow-xl btn-shadow">
                                            Edit
                                        </button>
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('delete', $student->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-hover btn-gradient text-white font-bold py-2 px-6 rounded-full shadow-xl btn-shadow">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>
</html>
