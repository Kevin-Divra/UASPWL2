@extends('layouts.app-public')
@section('title', 'Our Blog')
@section('content')
<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        /* Header */
        header {
            background-color: #1e456e;
            color: #fff;
            padding: 30px;
            text-align: center;
        }

        header h1 {
            margin-bottom: 10px;
        }

        main {
            display: flex;
            margin: 20px auto;
            max-width: 1200px;
        }

        .blog-posts {
            flex: 3;
            padding: 20px;
        }

        .blog-posts article {
            background: #fff;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .blog-posts h2 {
            color: #1e456e;
        }

        .blog-posts .tags span {
            display: inline-block;
            background: #e7f0fa;
            color: #1e456e;
            padding: 3px 8px;
            margin-right: 5px;
            border-radius: 3px;
            font-size: 12px;
        }

        .blog-posts .date {
            color: #888;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .blog-posts a {
            color: #1e456e;
            text-decoration: none;
        }

        aside {
            flex: 1;
            padding: 20px;
        }

        aside .rss-feed button {
            width: 100%;
            background-color: #1e456e;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        aside .tags-list ul {
            list-style: none;
        }

        aside .tags-list li {
            padding: 5px 0;
        }


    </style>
    <!-- Header -->
    <header>
        <h1>Blog</h1>
        <p>Welcome to the blog, your front page for electronic updates, product news, and more.</p>
    </header>

    <!-- Main Content -->
    <main>
        <section class="blog-posts">
            <article>
                <h2><a href="#">Top Christmas Electronic Gift Ideas for Everyone on Your List</a></h2>
                <p class="date">December 20, 2024</p>
                <div class="tags">
                    <span>Gift Idea</span>
                </div>
                <p>As the holiday season approaches, finding the perfect Christmas gift for loved ones can be a challenge. Luckily, the world of electronics...  <a href="#">Read more</a></p>
            </article>
            <article>
                <h2><a href="#">Unlock the Best Black Friday Deals: Savings for Everyone</a></h2>
                <p class="date">November 8, 2024</p>
                <div class="tags">
                    <span>Black Friday</span>
                </div>
                <p>Black Friday is back, and it's bigger than ever! As the holiday shopping season kicks off, retailers are offering unbeatable discounts on everything...  <a href="#">Read more</a></p>
            </article>
            <article>
                <h2><a href="#">A Home Remodeling Recce: Practical Recommendations for Every Room</a></h2>
                <p class="date">August 8, 2024</p>
                <div class="tags">
                    <span>Recommendations</span>
                </div>
                <p>There, a decision has finally been made to renovate the house. But where should you start? From a bigger laundry room to place the new...  <a href="#">Read more</a></p>
            </article>
            <article>
                <h2><a href="#">Your Ultimate Guide to Picking the Perfect Grill</a></h2>
                <p class="date">May 26, 2024</p>
                <div class="tags">
                    <span>Guide</span>
                </div>
                <p>Have you ever found yourself staring at your kitchen stove on a beautiful summer day, wishing you could cook outdoors?  Well, you are not alone...  <a href="#">Read more</a></p>
            </article>
        </section>

        <!-- Sidebar -->
        <aside> 
            <div class="tags-list">
                <h3>TAGS</h3>
                <ul>
                    <li>Gift Idea</li>
                    <li>Guide</li>
                    <li>Recommendations</li>
                    <li>Sales</li>
                    <li>Other</li>
                </ul>
            </div>
        </aside>
    </main>
</body>
@endsection