<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MathVerse | Login</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@500;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>public/css/auth.css">
    <link rel="stylesheet" href="<?= base_url();?>public/css/toast.css">
</head>
<body class="flex flex-col items-center justify-center p-4 min-h-screen">
    <div class="stars-container"></div>
    <div class="digital-rain"></div>
    <div class="cyber-grid"></div>
    <div id="particle-container"></div>
    <div id="toast-container"></div>

    <audio id="notifSound" src="<?= base_url();?>public/resources/notif.mp3" preload="auto"></audio>
    
    <div class="w-full max-w-sm z-20">
        <div class="portal-frame">
            <div class="corner top-0 left-0 border-r-0 border-b-0"></div>
            <div class="corner top-0 right-0 border-l-0 border-b-0"></div>
            <div class="corner bottom-0 left-0 border-r-0 border-t-0"></div>
            <div class="corner bottom-0 right-0 border-l-0 border-t-0"></div>

            <div class="p-6 pb-8">
                <div id="loginMod" class="module module-active">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-2xl font-orbitron font-black text-white uppercase tracking-wider leading-tight">LOGIN ACCOUNT</h2>
                            <p class="text-cyan-400 font-mono text-[9px] tracking-widest mt-1 uppercase font-bold">User Authentication</p>
                        </div>
                        <i class="fas fa-user-shield text-3xl text-cyan-500/20"></i>
                    </div>

                    <form id="logForm" method="POST" action="<?=site_url('auth/login');?>" class="space-y-4">
                        <?php csrf_field(); ?>
                        <div class="space-y-1.5 relative">
                            <label class="text-cyan-400 text-[10px] font-bold uppercase tracking-[0.15em] ml-1">Identity Access</label>
                            <div class="relative">
                                <i class="fas fa-id-card-clip absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                                <?php $LAVA =& lava_instance(); ?>
                                <input type="text" name="email" class="input-mobile-ultra" placeholder="Enter Email or ID" required autofocus autocomplete="off"/>
                            </div>
                        </div>
                        <div class="space-y-1.5 relative">
                            <label class="text-purple-400 text-[10px] font-bold uppercase tracking-[0.15em] ml-1">Password</label>
                            <div class="relative">
                                <i class="fas fa-key absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                                <input type="password" name="password" id="lPass" class="input-mobile-ultra pr-12" placeholder="Enter Password" required autocomplete="off"/>
                                <button type="button" onclick="tglPass('lPass', 'lIcon')" class="absolute right-1.5 top-1/2 -translate-y-1/2 h-8 w-10 flex items-center justify-center text-slate-500 active:text-cyan-400">
                                    <i id="lIcon" class="fas fa-eye-slash text-lg"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-2">
                            <label class="flex items-center cursor-pointer group">
                                <div class="relative">
                                    <input type="checkbox" id="keepLoggedIn" class="hidden peer">
                                    <div class="w-4 h-4 border border-cyan-500/50 rounded-sm bg-slate-900/80 peer-checked:bg-cyan-500 transition-all flex items-center justify-center">
                                        <i class="fas fa-check text-[10px] text-black opacity-0 peer-checked:opacity-100"></i>
                                    </div>
                                </div>
                                <span class="ml-2 text-[9px] font-bold uppercase tracking-widest text-slate-400 group-hover:text-cyan-400 transition-colors">Keep Logged In</span>
                            </label>
                            <button type="button" onclick="location.href='<?=site_url('auth/password-reset');?>'" class="text-cyan-500/60 hover:text-cyan-400 text-[9px] font-bold uppercase tracking-widest transition-colors">
                                Forgot Password?
                            </button>
                        </div>

                        <button type="submit" class="btn-mobile-ultra cyan-900 mt-2">
                            <span class="text-md">Access Portal</span>
                            <i class="fas fa-sign-in-alt text-sm"></i>
                        </button>
                    </form>
                    <div class="mt-8 flex flex-col items-center gap-4">
                        <button onclick="location.href='<?=site_url('auth/register');?>'" class="text-cyan-500 text-[10px] font-black uppercase tracking-[0.15em] border-b border-cyan-500/20 pb-0.5">
                            No Account? Create One
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url();?>public/js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(function() {
            var regForm = $("#regForm")
                if(regForm.length) {
                    regForm.validate({
                        rules: {
                            email: {
                                required: true,
                            },
                            password: {
                                required: true,
                                minlength: 8
                            },
                            password_confirmation: {
                                required: true,
                                minlength: 8
                            },
                            username: {
                                required: true,
                                minlength: 5
                            }
                        },
                        messages: {
                            email: {
                                required: "Please input your email address.",                            
                            },
                            password: {
                                required: "Please input your password",
                                minlength: jQuery.validator.format("Password must be atleast {0} characters.")
                            },
                            password_confirmation: {
                                required: "Please input your password",
                                minlength: jQuery.validator.format("Password must be atleast {0} characters.")
                            },
                            username: {
                                required: "Please input your username.",                            
                            }
                        },
                    })
                }
        })
    </script>
    

    <script src="<?= base_url();?>public/js/toast.js"></script>
    <?php toast_alert(); ?>

</body>
</html>