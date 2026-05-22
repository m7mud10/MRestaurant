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

        .time {
            width: 50% !important;
            margin-left: 47%;
        }

        .login-btn {
            background: #bfc2007a;
            color: #fff !important;

            &:hover {
                background: #eeff0089 !important;
            }

            &:active {
                background: #bfc2007a !important;
            }
        }
    </style>
    <form action="/dashboard/admin/{{$recipe->id}}" method="POST">
        @csrf
        @method('PUT')
        <h3>Update Recipe</h3>
        <div class="inputs">
            <div class="">
                <label for="img">img:</label>
                <input type="file" id="img" name="img" value="{{$recipe->img}}" required>
            </div>
            <div class="">
                <label for="name">name:</label>
                <input type="text" id="name" name="name" value="{{$recipe->name}}" required>
            </div>
            <div class="">
                <label for="ingradients">ingradients:</label>
                <textarea id="ingradients" name="ingradients">{{$recipe->ingradients}}</textarea>
            </div>
            <div class="time">
                <label for="time">time:</label>
                <input type="number" id="time" name="time" value="{{$recipe->time}}">
            </div>
        </div>

        <input type="submit" value="Update" class="btn login-btn">
    </form>
</x-form>