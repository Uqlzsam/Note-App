<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
       
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .error-messages {
            color: red;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 5px;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        .form-actions {
            display: flex;
            justify-content: center; /* Center the buttons */
            gap: 10px; /* Add space between buttons */
            margin-top: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 45%;
        }

        button:hover {
            background-color: #45a049;
        }

        .delete-button {
            background-color: #f44336;
        }

        .delete-button:hover {
            background-color: #e53935;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            input[type="text"], button, textarea {
                font-size: 14px;
            }

            .form-actions {
                flex-direction: column;
            }

            button {
                width: 100%;
                margin-bottom: 10px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 24px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
    <script>
        // JavaScript function for delete confirmation
        function confirmDelete(event) {
            if (!confirm("Are you sure you want to delete this note?")) {
                event.preventDefault(); // Prevent form submission if canceled
            }
        }
    </script>
</head>
<body>

    <h1>Edit Note</h1>

    <div class="container">
        
        <div class="error-messages">
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <form method="post" action="{{ route('note.update', $note->id) }}">
            @csrf
            @method('put')

            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $note->title }}">
            </div>

            <div>
                <label for="content">Content</label>
                <textarea name="content" id="content">{{ $note->content }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit">Update</button>
            </div>
        </form>

        <form method="post" action="{{ route('note.destroy', $note->id) }}">
            @csrf
            @method('delete')
            <div class="form-actions">
                <button class="delete-button" type="submit" onclick="confirmDelete(event)">Delete</button>
            </div>
        </form>
    </div>

</body>
</html>
