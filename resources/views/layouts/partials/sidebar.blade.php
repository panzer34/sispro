<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fab fa-youtube"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>app</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->

<li class="nav-item active">
    <a class="nav-link" href="{{route('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Inicio</span></a>
</li>
@if(auth()->user()->role == 'admin')
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Configuracion
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Administracion</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{route('users.index')}}">
            <i class="fas fa-user"></i> Usuario
            </a>
            <a class="collapse-item" href="#">
            <i class="fas fa-address-card"></i> Roles
            </a>
            <a class="collapse-item" href="cards.html">
            <i class="fas fa-hand-paper"></i> Permisos</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="{{route('patients.index')}}">
    <i class="fas fa-user"></i>
        <span>Pacientes</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('doctors.index')}}">
    <i class="fas fa-user-md"></i>
        <span>Odontologos</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('specialties.index')}}">
    <i class="fas fa-hand-holding-medical"></i>
        <span>Especialidad</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('supplies.index')}}">
    <i class="fas fa-boxes"></i>
        <span>Insumos</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('medicines.index')}}">
    <i class="fas fa-pills"></i>
        <span>Medicamentos</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('appointments.index')}}">
    <i class="fas fa-boxes"></i>
        <span>Citas</span></a>
</li>



@elseif(auth()->user()->role == 'doctor')

<li class="nav-item">
    <a class="nav-link" href="{{route('prescriptions.index')}}">
    <i class="fas fa-prescription-bottle-alt"></i>
        <span>Receta</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('procedures.index')}}">
    <i class="fas fa-procedures"></i>
        <span>Procedimientos</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('horarios.index')}}">
    <i class="fas fa-procedures"></i>
        <span>Horario</span></a>
</li>

@endif






<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->