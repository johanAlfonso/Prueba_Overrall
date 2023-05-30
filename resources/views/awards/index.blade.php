<style>
    .card-image {
    width: 100px; 
    height: 100px; 
    object-fit: cover; 
    }

    .card-space {
        margin-left: 10px;
        margin-right: 10px;
    }
    .card-space:hover {
        cursor: pointer;
    }
</style>
@extends('layaouts.master')
@section('content')
<div id="app">
    @include('layaouts.partials.messages')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div style="margin-top: 10px;">
            <h1>Awards</h1>
            <p>Click on the award you want to register</p>
        </div> 
    </div>
    @csrf
    <div>
        <div style="margin-top: 10px; display: inline-flex;">
            <div class="card card-space" style="width: 280px; height: 220px;" @click="createAward('Science')">
                <img src="{{ url('assets/image/science.jpg')}}" class="card-img-top card-image" alt="science image">
                <div class="card-body">
                    <h2>Science</h2>
                    <p class="card-text">Award for the best scientist of the year.</p>
                </div>
            </div>
            <div class="card card-space" style="width: 280px; height: 220px;" @click="createAward('Sport')">
                <img src="{{ url('assets/image/sport.jpg')}}" class="card-img-top card-image" alt="science image">
                <div class="card-body">
                    <h2>Sport</h2>
                    <p class="card-text">Award for the most outstanding high performance athlete.</p>
                </div>
            </div>
            <div class="card card-space" style="width: 280px; height: 220px;" @click="createAward('Art')">
                <img src="{{ url('assets/image/art.jpg')}}" class="card-img-top card-image" alt="science image">
                <div class="card-body">
                    <h2>Art</h2>
                    <p class="card-text">Award for the creator of the best-selling painting of the year.</p>
                </div>
            </div>
            <div class="card card-space" style="width: 280px; height: 220px;" @click="createAward('Literature')">
                <img src="{{ url('assets/image/literature.jpg')}}" class="card-img-top card-image" alt="science image">
                <div class="card-body">
                    <h2>Literature</h2>
                    <p class="card-text">Award for the most popular book writer of the year.</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div style="margin-top: 10px;">
            <h1>Awarded</h1>
        </div> 
        <div>
            <table id="awardTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Last name</th>
                        <th>Address</th>
                        <th>Cell phone number</th>
                        <th>Email</th>
                        <th>Award</th>
                    </tr>
                </thead>
                <tbody>     
                    <tr v-for="award in awards">
                        <td>@{{award.name}}</td>
                        <td>@{{award.lastname}}</td>
                        <td>@{{award.address}}</td>
                        <td>@{{award.number}}</td>
                        <td>@{{award.email}}</td>
                        <td>@{{award.award}}</td>
                    </tr>     
                </tbody>
            </table> 
        </div>
    </div>
    @include('awards.createModal')
</div>
@endsection
<script src="{{ url('assets/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        const awards = {!! $awards !!};
        const { createApp } = Vue
        createApp({
            data() {
                return {
                    awards: awards,
                    awards_to_register: "",
                }
            },
            methods: {
                createAward(award) {
                    this.awards_to_register = award;
                    $('#create_modal').modal('show');
                }, 
                closeModal() {
                    $('#create_modal').modal('hide');
                }
            }
        }).mount('#app');

        $('#awardTable').DataTable({
            "pageLength": 5,
            "lengthChange" : false
        });
    });
</script>