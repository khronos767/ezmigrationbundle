<?php

namespace Kaliop\eZMigrationBundle\Core\ComplexField;

use eZ\Publish\Core\FieldType\Author\Value as AuthorValue;
use eZ\Publish\Core\FieldType\Author\AuthorCollection;
use eZ\Publish\Core\FieldType\Author\Author;
use Kaliop\eZMigrationBundle\API\ComplexFieldInterface;

class EzAuthor extends AbstractComplexField implements ComplexFieldInterface
{
    /**
     * Creates a value object to use as the field value when setting an author field type.
     *
     * @param array $fieldValueArray The definition of teh field value, structured in the yml file
     * @param array $context The context for execution of the current migrations. Contains f.e. the path to the migration
     * @return AuthorValue
     */
    public function createValue(array $fieldValueArray, array $context = array())
    {
        $authors = array();
        foreach($fieldValueArray['authors'] as $author) {
            $authors[] = new Author($author);
        }

        return new AuthorValue($authors);
    }
}
