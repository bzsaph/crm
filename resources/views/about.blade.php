@extends('layouts.home')

@section('content')


    <div class="container" style="margin-top: 14%:color:#fff">
        <div style="background-color: white">
            <br><br>
            <h2 class="text-center">~ Our Mission ~</h2>
            <h6 class="text-center">To connect investors to zeleous enterpreneurs</h6>

            <br><br>
            <p style="margin-left:8%; margin-right:8%">
                We are an intermediate company that helps entrepreneurs to connect with investors, either helping
                with mentorship, trainings, and funding.

                According to what an entrepreneur project needs or investor wants, we categorize them and analyze
                deeply their targets before matching them. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Molestias rerum velit, aliquid tempore, accusamus
                hic at fugiat voluptatibus nulla officia expedita qui! Error, libero voluptatum. Corrupti illo officia optio
                repellat. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt, quas culpa? Adipisci vel
                voluptates doloremque dolorem recusandae ipsum exercitationem fugit doloribus expedita ab eligendi
                voluptatem, at quas quos dolores deserunt!<br><br><br>
            </p>


        </div>
        <br><br>

        <div style="background-color: white">
            <h2 class="text-center" style="padding-top:3%">~ Leadership ~</h2>
            <br><br>
            <h2 class="text-center" style="padding-top:3%"> <u>Join venture</u>  </h2>
            <br><br>
            <div class="container row">

                <div class="col-md-4 justfiy-content-center">
                    <img src="{{ url('assets/img/test3.png') }}"
                        alt="" style="width:200px; border-radius:50%">
                    <h5>IT company</h5>
                    <p class="text-secondary">Co-founder</p>
                    <br>
                    <p class="text-justify">YANJYE is a Platform that was established by enthusiastic IT professionals,
                         the forum focuses on creating IT solutions to other learners who are passionate to develop
                         their IT capabilities and have not had a chance to this effect. The platform looks forward to
                         developing skill sets in programming, Software development, and other IT skill sets.
                        The platform looks forward to mentor and develops trainees at all levels regardless of their IT background by teaching them from scratch coding language.
                        <a href="https://yanjye.com/about-us" class="text-danger">more</a>
                    </p>

                </div>
                <div class="col-md-4 justfiy-content-center">
                    <div class="text-center">
                        <img src="{{ url('assets/img/connecting.png') }}" class="rounded" alt="..."  style="width:200px; border-radius:50%">
                      </div> <br>
                      <div class="text-center">
                       <p>Woodbary</p>
                      </div>

                </div>

                <div class="col-md-4 justfiy-content-center " >

                    <img src="{{ url('assets/img/envisage.png') }}"  alt="" style="width:200px; border-radius:50%">
                    <h5>INCUBATORS Company</h5>
                    <p class="text-secondary">co-founder</p>
                    <br>
                    <p class="text-justify">Envisage Kigali was inaugurated by the Minister of Agriculture in August 2019,
                        it’s the first incubator launched by Envisage. At the Kigali location we offer promising early-stage agribusiness startups a 6-months long
                         incubation program. The space is located at the BDF House in Gatenga. The office is creative and functional, with 32 hot desks, a lounge and a meeting room.
                         <a href="https://www.envisageincubators.com/goals" class="text-danger">more</a>
                        </p>
                </div>


            </div>
        </div>
        <br><br>
    </div>

@endsection
