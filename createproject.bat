@echo off
set /p project_name="Nombre proyecto: "
composer create-project symfony/framework-standard-edition %project_name%