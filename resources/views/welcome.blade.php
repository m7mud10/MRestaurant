<x-page>
    <style>
        .glass {
            overflow-y: scroll;
            position: relative;

            &::-webkit-scrollbar {
                display: none;
            }
        }

        .recipe-ingradients {
            text-align: left;
            padding: 0 10px;
        }

        .recipe-ingradients {
            text-align: left;
            padding: 0 20px;
            overflow-wrap: break-word;
        }

        b {
            color: #a72222;
        }

        .per-time {
            position: absolute;
            /* width: 40px;
            height: 40px; */
            right: 1%;
            top: 1%;
            z-index: 3;
            padding: 10px;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(15px);
            border-radius: 10px;
            box-shadow: 1px 1px 0 0 rgba(255, 255, 255, 0.8) inset,
                3px 5px 10px 0 rgba(0, 0, 0, 0.1);
            text-decoration: none;
            will-change: color, text-shadow, font-size;
        }
    </style>
    <header>
        <nav>
            <div class="glass nav-bar">
                <p class="logo">
                    MRestaurant
                </p>
                <a href="/auth/login" class="btn">Log in</a>
            </div>
        </nav>
        <section id="home" class="main">
            <div class="main-content">
                <h1 class="main-title">Delicious Recipes</h1>
                <p class="main-description">Discover amazing dishes with fresh ingredients and simple instructions</p>
                <div class="main-buttons">
                    <a href="#recipes" class="glass btn">Explore Recipes</a>
                </div>
            </div>
        </section>
    </header>
    <section id="recipes">
        <div class="container">
            <h1 class="main-title">Popular Recipes</h1>
            <p class="main-description">Explore our collection of delicious recipes, from quick meals to gourmet delights</p>
            <nav class="menu">
                @foreach ($recipe as $recipe)
                <div class="glass">
                    <p class="per-time">{{$recipe->time}} min</p>
                    <div class="recipe-img"><img src="imgs/{{$recipe->img}}" alt=""></div>
                    <h3 class="recipe-name">{{$recipe->name}}</h3>
                    <p class="recipe-ingradients"><b>Ingradients:</b><br><br>{{$recipe->ingradients}}</p>
                </div>
                @endforeach
            </nav>
        </div>
    </section>
</x-page>