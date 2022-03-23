<?php

namespace App\Controller\Admin;

use App\Form\LinkType;
use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
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
            CollectionField::new('links', 'Liens')
            ->setEntryType(LinkType::class)
            ->setFormTypeOption('by_reference', false)
            ->onlyOnForms(),
            AssociationField::new('category', 'Catégorie')
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
