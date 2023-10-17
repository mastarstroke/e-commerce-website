<!DOCTYPE html>
<html lang="zxx">

<head>
  @include('header.index')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

  @include('header.menu')
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="contact__content text-center">
                <div class="contact__address">
                    <h5>Contact info</h5>
                    <ul>
                        <li>
                            <h6><i class="fa fa-map-marker"></i> Address</h6>
                            <p>160 Pennsylvania Ave NW, Washington, Castle, PA 16101-5161</p>
                        </li>
                        <li>
                            <h6><i class="fa fa-phone"></i> Phone</h6>
                            <p><span>125-711-811</span><span>125-668-886</span></p>
                        </li>
                        <li>
                            <h6><i class="fa fa-headphones"></i> Support</h6>
                            <p>Support.photography@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <div class="contact__form" >
                    <h5>SEND MESSAGE</h5>
                    <form action="{{route('contacts-us')}}" method="post">
                        @csrf
                        <input type="text" placeholder="Name" name="name" required>
                        <input type="text" placeholder="Email" name="email" required>
                        <textarea placeholder="Message" name="message" required></textarea>
                        <button type="submit" class="site-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Footer Section Begin -->
<footer class="footer bg-dark">
  @include('footer.index')
</body>

</html>