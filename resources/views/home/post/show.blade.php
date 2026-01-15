@php
    use Illuminate\Support\Carbon;
@endphp
<x-home.master :title="$title">

    <x-home.bread-crumb :title="$title"/>

    <div class="vl-sidebar-area sp2">
        <div class="container">
            <div class="row">

                <div class="col-xl-8 mx-auto">
                    <div class="vl-event-content-area">
                        <div class="vl-blog-meta-box mt-32">
                            <ul>
                                <li><a href="#"> <span><img src="https://raw.githubusercontent.com/Bekenweb/best-assets/e9015eefee582220c66d1cc606274e8e73cf09d6/shapes/user-circle-duotone.svg" alt=""></span>Admin</a></li>
                                <li><a href="#"> <span class="icon"><img class="mt-4-" src="https://html.vikinglab.agency/helpy/assets/img/icons/vl-calender-1.1.svg" alt=""></span> {{ Carbon::parse($post->updated_at)->isoFormat('D MMM Y') }}</a></li>
                            </ul>
                        </div>
                        <div class="vl-event-content vl-blg-content">
                            <h2 class="title">Tips for Disaster Preparedness: How <br> to Stay Safe and Ready</h2>
                            <p class="para pb-16">Our blog is a space where we share the heart of our mission, offering an inside look at the incredible work being done and the lives being transformed through your support. Each post features real stories from the field, updates on our current projects. </p>
                            <p class="para pb-32">Whether you're learning about a new initiative, discovering how your donations are making an impact, or finding inspiration to get  involved, our blog is here to connect.</p>
                        </div>
                        <div class="vl-blg-icon-box">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-blog-box1 mb-30">
                                        <a href="#" class="title">Mission and Vision</a>
                                        <p class="para">Join us on this journey &amp; let continue making the world a better place.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-blog-box1 mb-30">
                                        <a href="#" class="title">A Journey of Impact</a>
                                        <p class="para">Our blog is more than just  collection of updates it’s a platform for sharing.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="event-content-area">
                            <h2 class="title">Join Us in Making a Difference</h2>
                            <p class="para">We invite you to join us, meet like-minded individuals, and become part of a movement that makes real, lasting change. Whether you attend, volunteer, or help spread the word, your involvement is invaluable. Explore our upcoming events.</p>

                            <h2 class="title">Event Highlights &amp; Details</h2>
                            <p class="para">Our events are designed to unite passionate individuals, raise critical funds, &amp; increase awareness for the causes we serve. Each event offers a unique opportunity to connect, contribute, and witness the power of community in action.</p>
                            <p class="para">Our events are opportunities to bring people together for meaningful causes, creating moments of connection and impact that extend far beyond the day itself.</p>


                            <h2 class="title">Upcoming Fundraisers and Community Events</h2>
                            <p class="para">From heartwarming charity dinners to hands-on volunteer days, these gatherings allow us to celebrate milestones, share stories of impact, and inspire further action. By joining us at our upcoming events, you’re not just attending you’re becoming part movement.</p>
                            <p class="para">Each event, whether a fundraiser, awareness campaign, volunteer drive, or community gathering, plays a vital role in supporting our mission and raising essential resources.</p>

                            <h2 class="title">Event Details and How to Participate</h2>
                            <p class="para">Whether you attend, volunteer, or help spread the word, your involvement is invaluable. Explore our upcoming events, find ways to get involved, and help us create brighter futures for those in need. Together, we can make an extraordinary impact!</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-home.master>