<?php

namespace App\Controller\Admin;

use App\Form\LinkType;
use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Projets')
            ->setPageTitle('new', 'Créer un projet')  
            ->setPageTitle('edit', 'Modifier un projet')
            ;        
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', "Titre"),
            TextField::new('short_description', 'Description courte'),
            TextEditorField::new('description', "Description"),
            BooleanField::new('is_visible', "Visibilité"),
            AssociationField::new('category', 'Catégorie'),
            UrlField::new('github', 'Github'),
            UrlField::new('website', 'Site'),
            TextareaField::new('thumbnailFile', 'Thumbnail')
                ->setFormType(VichImageType::class)
                ->setHelp("Choisissez l'image qui sera sur la page principale"),
            TextareaField::new('mockupFile', 'Mockup')
            ->setFormType(VichImageType::class)
            ->setHelp("Choisissez l'image qui sera sur le détail du projet"),
        ];
    }


    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function(Action $action)
            {
                return $action->setLabel('Créer un projet');
            });
    }
}
