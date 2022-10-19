@extends('home.index')
@section('a')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="index.html">Home</a>
                <span>Contact</span>
            </div>

            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Contact</h2>
                        <ul class="contact-detail">
                            <li>
                                <img src="images/icon-contact-map.png" alt="#">
                                <address><span>Company name. INC</span> <br>550 Avenue Street, New york</address>
                            </li>
                            <li>
                                <img src="images/icon-contact-phone.png" alt="">
                                <a href="tel:1590912831">+1 590 912 831</a>
                            </li>
                            <li>
                                <img src="images/icon-contact-message.png" alt="">
                                <a href="mailto:contact@companyname.com">contact@companyname.com</a>
                            </li>
                        </ul>
                        <div class="contact-form">
                            <input type="text" class="name" placeholder="name...">
                            <input type="text" class="email" placeholder="email...">
                            <input type="text" class="website" placeholder="website...">
                            <textarea class="message" placeholder="message..."></textarea>
                            <input type="submit" value="Send Message ">

                        </div>
                    </div>
                    <div class="col-md-7 col-md-offset-1">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61349.62126481437!2d108.17168647810733!3d16.04724839465259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0xfc14e3a044436487!2sDa%20Nang%2C%20H%E1%BA%A3i%20Ch%C3%A2u%20District%2C%20Da%20Nang%2C%20Vietnam!5e0!3m2!1sen!2s!4v1655132708414!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container -->
</main>
@endsection