<x-form>
    <style>
        .login-form {
            height: auto;
            width: 60%;
        }

        .inputs {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .login-btn {
            background: #13c2007a;
            color: #fff !important;
            width: 50% !important;
            margin: auto;

            &:hover {
                background: #1aff0089 !important;
            }

            &:active {
                background: #13c2007a !important;
            }
        }

        textarea {
            width: 140%;
            height: 100px;
            background-color: #33333318;
            border-radius: 3px;
            padding: 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
            resize: none;
            caret-color: #a72222;

            &::placeholder {
                color: #0000005b;
                font-size: 15px;
            }

            &:focus {
                outline-color: #a72222;
            }
        }
        .time{
            width: 50% !important;
            margin-left: 47%;
        }
    </style>
    <form action="/dashboard/admin" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Add Recipe</h3>
        <div class="inputs">
            <div>
                <label for="img">img:</label>
                <input type="file" id="img" name="img" value="imgs/" required>
            </div>
            <div>
                <label for="name">name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="ingradients">ingradients:</label>
                <textarea name="ingradients" id="ingradients"></textarea>
            </div>
            <div class="time">
                <label for="time">time:</label>
                <input type="number" id="time" name="time" >
            </div>
        </div>

        <input type="submit" value="Add" class="btn login-btn">
    </form>
</x-form>