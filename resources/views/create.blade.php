@include('header')

<section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-form">
                    <h2 class="form-title">Create Blog</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <input type="text" name="title" id="your_name" placeholder="Title here" />
                        </div>
                        <div class="form-group">
                            <!-- <input type="textarea" name="message" id="your_message" placeholder="Type your message here.." /> -->
                            <textarea id="message" name="message" rows="3" cols="50" placeholder="Type your message here"></textarea>

                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Create" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@include('footer')