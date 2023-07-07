<div class="sidebar" id="sidebar">
    <ul>
        <li><a href="#">Menu 1</a></li>
        <li><a href="#">Menu 2</a></li>
        <li><a href="#">Menu 3</a></li>
        <li><a href="#">Menu 4</a></li>
    </ul>
</div>

<style>
    .sidebar{
        width: 20%;
        background-color: #f1f1f1;
    }

    .sidebar ul{
        list-style-type: none;
        padding: 2%;
    }

    .sidebar li{
        margin-bottom: 1%;
    }

    .sidebar a{
        display: block;
        text-decoration: none;
        color: #333;
        font-size: 2vw;
        white-space: nowrap;
        margin-bottom: 2vw;
    }

    @media (max-width: 768px) {
        .sidebar{
            width: 100%;
        }

        .sidebar ul{
            padding: 2%;
        }

        .sidebar li{
            margin-bottom: 2%;
        }
    }
</style>


<style>
    .content{
        max-width: 100%;
        padding: 0 2%;
        margin: 0 auto;
        box-sizing: border-box;
    }

    h2{
        font-size: 3vw;
        text-align: center;
    }

    p{
        font-size: 2vw;
        text-align: justify;
    }

    @media (max-width: 768px) {
        h2{
            font-size: 4vw;
        }

        p{
            font-size: 3vw;
        }
    }
</style>

<div class="content">
    <h2>BODY</h2>
    <p>Halaman dashboard perpus</p>
</div>

<footer>
    <p>Ini adalah footer</p>
</footer>

<style>
    footer{
        background-color: #333;
        color: #fff;
        padding: 1%;
        text-align: center;
        font-size: 2vw;
    }

    @media (max-width: 768px) {
        footer{
            font-size: 3vw;
        }
    }
</style>