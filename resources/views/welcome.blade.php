@extends ('layouts.app')

@section('content')

            <div class="container">
                <h1>Customer Relationship Management System</h1>
                <p>Welcome to this page, here follow some instructions</p>

                <table class="mb-3">
                    <tr>
                        <td><h5 class="mb-3">1 Register an account</h5></td>
                    </tr>
                    <tr>
                        <td><h5 class="mb-3">2 You can add new (potential) customers to your customers list.</h5></td>
                    </tr>
                    <tr>
                        <td><h5 class="mb-3">3 You can click on your newly created customers to view an individual customer.</h5></td>
                    </tr>
                    <tr>
                        <td><h5 class="mb-3">4 You can choose to edit the customer or remove the customer completely.</h5></td>
                    </tr>
                    <tr>
                        <td><h5 class="mb-3">5 You can add specific tasks to each customer with the due date of the task.</h5></td>
                    </tr>
                </table>
                <h6 class="text-muted">Hint: you are the only person allowed to view, update and delete your customers, don't worry!</h6>
                <h5>Made by Giel van Zwieten</h5>


            </div>


    @endsection
