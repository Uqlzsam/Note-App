<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folderly</title>
    <style>
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
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Floating create button */
        .create-button {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 60px;
            background-color: #4CAF50;
            color: white;
            font-size: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .create-button:hover {
            background-color: #45a049;
        }

        .error-messages {
            color: red;
            margin-bottom: 20px;
        }

        .search-bar {
            position: relative;
            margin-bottom: 20px;
        }

        .search-bar input[type="text"] {
            width: 100%;
            padding: 10px 40px 10px 20px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .search-bar .icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #ccc;
        }

        .suggestions {
            position: absolute;
            z-index: 100;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            max-height: 200px;
            overflow-y: auto;
            display: none;
        }

        .suggestions a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
        }

        .suggestions a:hover {
            background-color: #f1f1f1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .note-title {
            max-width: 150px;
        }

        .note-content {
            max-width: 400px;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }

        a:hover {
            color: #45a049;
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 14px;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 24px;
            }

            th, td {
                font-size: 12px;
                padding: 8px;
            }
        }
    </style>
    
</head>
<body>

    <h1>Notes</h1>

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

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($notes->count() > 0)
                        @foreach($notes as $note)
                        <tr class="note-row">
                            <td class="note-title">{{ $note->title }}</td>
                            <td class="note-content">{{ $note->content }}</td>
                            <td><a href="{{ route('note.edit', $note->id) }}">Edit</a></td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No notes found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Floating Create Note Button with Icon -->
    <a href="{{ route('note.create') }}" class="create-button" title="Create New Note">+</a>

</body>
</html>
