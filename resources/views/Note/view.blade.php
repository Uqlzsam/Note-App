<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Note</title>
    <style>
        /* Base Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .note-content {
            margin: 20px 0;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .note-content h2 {
            margin-top: 0;
            color: #333;
        }

        .note-content p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        a, button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        a:hover, button:hover {
            background-color: #45a049;
        }

        button {
            width: 100%;
            max-width: 120px;
        }

        form {
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }

            .actions {
                flex-direction: column;
                align-items: center;
            }

            a, button {
                width: 100%;
                margin-bottom: 10px;
                font-size: 14px;
            }
        }

    </style>
</head>
<body>
    
    <h1>{{ $note->title }}</h1>

    <div class="container">
        <div class="note-content">
            <h2>{{ $note->title }}</h2>
            <p>{{ $note->content }}</p>
        </div>

        <div class="actions">
            <a href="{{ route('notes.edit', $note->id) }}">Edit</a>

            <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>

</body>
</html>
