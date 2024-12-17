<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Materials - Electronics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .hero-section {
            background: url('https://wallpaperaccess.com/full/742122.jpg') no-repeat center center/cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .materials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .material-card {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 1.5s, box-shadow 1.5s; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        .material-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            height: 420px;
        }

        .material-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .content {
            padding: 1rem;
            flex-grow: 1;
        }

        .content h3 {
            margin: 0 0 0.5rem;
            font-size: 1.25rem;
            color: black;
        }

        .content p {
            font-size: 0.95rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .expanded-info {
            display: none;
            font-size: 0.95rem;
            color: #495057;
            margin-top: 1rem;
            opacity: 0;
            max-height: 0;
            transition: opacity 1.5s ease, max-height 1.5s ease; 
        }

        .material-card:hover .expanded-info {
            display: block;
            opacity: 1;
            max-height: 1000px; 
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <section class="hero-section">
            <div class="container">
                <h1>Our Material</h1>
                <p>Discover how we source and develop cutting-edge materials to create the best Handphone, Laptop, and TV for you.</p>
            </div>
    </section>
    
    <div class="container">
        <div class="materials-grid">
            <!-- Card 1 -->
            <div class="material-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQd8WtLjxv0WfgoIvdQD-U66JrnGwpQkEuzCg&s" alt="Advanced Processors">
                <div class="content">
                    <h3>Advanced Processors</h3>
                    <p>Explore the latest high-speed processors designed for efficient performance.</p>
                    <div class="expanded-info">
                        <p>Our processors deliver faster performance for demanding applications like AI and gaming, enhancing your computing experience.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="material-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpR9cL7h-oG9ahXjh79ekxiAC-0ncA1H2vpQ&s" alt="Battery Technology">
                <div class="content">
                    <h3>Next-Gen Batteries</h3>
                    <p>Long-lasting, fast-charging batteries to power your devices.</p>
                    <div class="expanded-info">
                        <p>Our batteries offer rapid charging and longer life, ideal for mobile and electric devices, ensuring optimal performance.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="material-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcQPOyEKaH0ca8oRZqhKTzQJDS7vJr6xeQTQ&s" alt="Display Technologies">
                <div class="content">
                    <h3>Cutting-Edge Displays</h3>
                    <p>Experience vibrant, energy-efficient screens with better contrast and clarity.</p>
                    <div class="expanded-info">
                        <p>Our displays use OLED and Mini-LED technologies for brighter, sharper visuals, providing an immersive experience with lower power consumption.</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="material-card">
                <img src="https://www.simplilearn.com/ice9/free_resources_article_thumb/iot_devices.jpg" alt="IoT Devices">
                <div class="content">
                    <h3>IoT Devices</h3>
                    <p>Explore smart devices that make your life easier and more efficient.</p>
                    <div class="expanded-info">
                        <p>Our IoT devices include home automation, wearables, and smart sensors for better connectivity and control, offering a smarter environment.</p>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="material-card">
                <img src="https://www.wowrack.com/wp-content/uploads/2024/02/AI_Components.jpg" alt="AI Components">
                <div class="content">
                    <h3>AI Components</h3>
                    <p>Hardware designed for accelerating AI tasks like machine learning and deep learning.</p>
                    <div class="expanded-info">
                        <p>Our AI components boost machine learning capabilities, enabling real-time data processing for AI-driven applications in various industries.</p>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="material-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTG_b_WOL9fn2LfpX4vanSLyJ2RI9bVW5NxLg&s" alt="Sensors Technology">
                <div class="content">
                    <h3>Sensors Technology</h3>
                    <p>Advanced sensors for precision in various fields such as healthcare and automation.</p>
                    <div class="expanded-info">
                        <p>Our sensors enable accurate measurements and data collection for diverse applications, from health monitoring to robotics and automation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
