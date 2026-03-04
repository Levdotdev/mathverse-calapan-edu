<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MathVerse | Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@500;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link href="<?=base_url();?>public/css/main.css" rel="stylesheet">
    <link href="<?=base_url();?>public/css/auth.css" rel="stylesheet">
</head>
<body class="flex flex-col items-center justify-center p-4 min-h-screen">
    <div class="stars-container"></div>
    <div class="digital-rain"></div>
    <div class="cyber-grid"></div>
    <div id="particle-container"></div>

    <div class="w-full max-w-sm z-20">
        <div class="portal-frame">
            <div class="corner top-0 left-0 border-r-0 border-b-0"></div>
            <div class="corner top-0 right-0 border-l-0 border-b-0"></div>
            <div class="corner bottom-0 left-0 border-r-0 border-t-0"></div>
            <div class="corner bottom-0 right-0 border-l-0 border-t-0"></div>

            <div class="p-6 pb-8">
                <div id="regMod" class="module module-active">
                    <div class="flex justify-between items-center mb-5">
                        <div>
                            <h2 class="text-xl font-orbitron font-bold text-white uppercase tracking-wider leading-tight">CREATE ACCOUNT</h2>
                            <p class="text-purple-500 font-mono text-[8px] mt-0.5 font-bold tracking-widest">USER REGISTRATION SYSTEM</p>
                        </div>
                        <i class="fas fa-user-plus text-2xl text-purple-500/20"></i>
                    </div>

                    <?php if($LAVA->session->flashdata('alert') === 'is-valid'): ?>
                        <span class="text-green-500 text-xs font-bold mt-1 block">
                            <strong>Note: Password must be at least 8 characters and contains one of these special characters (!@£$%^&*-_+=?), number, uppercase and lowercase letters.</strong>
                        </span>
                    <?php endif; ?>
                    <?php flash_alert() ;?>
                    <form id="regForm" method="POST" class="space-y-3.5" action="<?=site_url('auth/register');?>" autocomplete="off">
                        <?php csrf_field(); ?>
                        <div class="space-y-2">
                            <p class="text-[9px] font-black text-slate-500 uppercase text-center tracking-[0.2em]">Select Role</p>
                            <div class="grid grid-cols-2 gap-2">
                                <label class="cursor-pointer group">
                                    <input type="radio" name="role" value="Student" class="hidden peer" checked onclick="updatePlaceholder('s')">
                                    <div class="p-2 border border-slate-800 rounded-xl peer-checked:border-cyan-500 peer-checked:bg-cyan-500/10 text-center transition-all">
                                        <i class="fas fa-user-graduate text-lg mb-0.5 text-slate-600 peer-checked:text-cyan-400"></i>
                                        <div class="text-[9px] font-black uppercase text-slate-500 peer-checked:text-white">Student</div>
                                    </div>
                                </label>
                                <label class="cursor-pointer group">
                                    <input type="radio" name="role" value="Teacher" class="hidden peer" onclick="updatePlaceholder('t')">
                                    <div class="p-2 border border-slate-800 rounded-xl peer-checked:border-purple-500 peer-checked:bg-purple-500/10 text-center transition-all">
                                        <i class="fas fa-chalkboard-teacher text-lg mb-0.5 text-slate-600 peer-checked:text-purple-400"></i>
                                        <div class="text-[9px] font-black uppercase text-slate-500 peer-checked:text-white">Teacher</div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="relative">
                            <i class="fas fa-id-badge absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                            <input type="text" id="uid" name="uid" maxlength="15" required class="input-mobile-ultra !pl-10 text-xs" placeholder="Student LRN" autocomplete="off">
                        </div>
                        <div class="relative">
                            <i class="fas fa-user-tag absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                            <input id="fName" type="text" class="input-mobile-ultra !pl-10 text-xs" name="fName" required placeholder="First Name" autocomplete="off"><br>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <input id="mName" name="mName" type="text" required class="input-mobile-ultra !pl-4 text-xs" placeholder="Middle Name" autocomplete="off">
                            <input id="lName" name="lName" type="text" required class="input-mobile-ultra !pl-4 text-xs" placeholder="Last Name" autocomplete="off">
                        </div>
                        <div class="relative">
                            <i class="fas fa-user-tag absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                            <input id="email" type="email" class="input-mobile-ultra !pl-10 text-xs" name="email" required placeholder="Email Address" autocomplete="off"><br>
                        </div>
                        <div class="space-y-3">
                            <div class="relative">
                                <i class="fas fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                                <input type="password" id="password" name="password" required class="input-mobile-ultra !pl-10 pr-10 text-xs" placeholder="Set Password" autocomplete="off">
                                <button type="button" onclick="tglPass('rPass', 'rPassIco')" class="absolute right-1.5 top-1/2 -translate-y-1/2 h-8 w-10 flex items-center justify-center text-slate-500 active:text-cyan-400">
                                    <i id="rPassIco" class="fas fa-eye-slash text-lg"></i>
                                </button>
                            </div>
                            <div class="relative">
                                <i class="fas fa-shield-alt absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                                <input type="password" id="password_confirmation" name="password_confirmation" required class="input-mobile-ultra !pl-10 pr-10 text-xs" placeholder="Confirm Password" autocomplete="off">
                                <button type="button" onclick="tglPass('rcPass', 'rcPassIco')" class="absolute right-1.5 top-1/2 -translate-y-1/2 h-8 w-10 flex items-center justify-center text-slate-500 active:text-cyan-400">
                                    <i id="rcPassIco" class="fas fa-eye-slash text-lg"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn-mobile-ultra cyan-900 mt-2">
                            <span class="text-md">Complete Registration</span>
                        </button>
                    </form>
                    <button onclick="location.href='<?=site_url('auth/login');?>'" class="mt-6 w-full text-slate-500 text-[9px] font-black uppercase tracking-[0.2em] flex items-center justify-center gap-2">
                        <i class="fas fa-chevron-left text-xs"></i> Back to Login
                    </button>
                </div>
            </div>
        </div>
    </div>
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
    <script src="<?= base_url();?>public/js/login.js"></script>
</body>
</html>
