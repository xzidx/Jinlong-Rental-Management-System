<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jinlong Property Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-blue-600 mb-4">Jinlong Property Management</h1>
            <p class="text-gray-600 mb-8">Rental Management System</p>
            <div class="space-x-4">
                <a href="{{ url('/login') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                    Login
                </a>
                <a href="{{ url('/register') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700">
                    Register
                </a>
            </div>
        </div>
    </div>
</body>
</html>
