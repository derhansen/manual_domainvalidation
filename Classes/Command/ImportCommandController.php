<?php
namespace Derhansen\ManualDomainvalidation\Command;

/***
 *
 * This file is part of the "Manual domain validation" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Torben Hansen <torben@derhansen.com>
 *
 ***/

use Derhansen\ManualDomainvalidation\Domain\Model\Data;
use TYPO3\CMS\Extbase\Property\PropertyMapper;
use TYPO3\CMS\Extbase\Validation\Error;
use TYPO3\CMS\Extbase\Validation\ValidatorResolver;

/**
 * Example
 */
class ExampleCommandController extends \TYPO3\CMS\Extbase\Mvc\Controller\CommandController
{
    /**
     * Some dummy data import
     *
     * @return void
     */
    public function importCommand()
    {
        /** @var PropertyMapper $propertyMapper */
        $propertyMapper = $this->objectManager->get(PropertyMapper::class);

        // Get some data - could for example be some data from a REST webservice
        $data = $this->getApiData();

        foreach ($data as $importRecord) {
            $dataModel = $propertyMapper->convert($importRecord, Data::class);
            // Note: The propertyMapper will set domain model default values for all all non-mappable values

            /* @var $validator \TYPO3\CMS\Extbase\Validation\Validator\ConjunctionValidator */
            $validator = $this->objectManager->get(ValidatorResolver::class)->getBaseValidatorConjunction(Data::class);
            $validationResults = $validator->validate($dataModel);

            if ($validationResults->hasErrors()) {
                $this->outputLine('Unable to import record: ' . json_encode($importRecord));

                /** @var Error $error */
                foreach ($validationResults->getFlattenedErrors() as $field => $errors) {
                    $errorMessages = [];
                    foreach ($errors as $error) {
                        $errorMessages[] = $error->getMessage();
                    }
                    $this->outputLine('Field: ' . $field . ' (' . implode(',', $errorMessages) . ')');
                }
            } else {
                // Import record to repository...
            }
        }
    }

    /**
     * Simple command which shows how to validate a manually generated domain model object
     *
     * @return void
     */
    public function simpleCommand()
    {
        /** @var Data $dataModel */
        $dataModel = $this->objectManager->get(Data::class);
        $dataModel->setDescription('too short');

        /* @var $validator \TYPO3\CMS\Extbase\Validation\Validator\ConjunctionValidator */
        $validator = $this->objectManager->get(ValidatorResolver::class)->getBaseValidatorConjunction(Data::class);
        $validationResults = $validator->validate($dataModel);

        if ($validationResults->hasErrors()) {
            // ...show errors in $validationResults->getFlattenedErrors()
            $this->outputLine('Validation errors for object');
        }
    }

    /**
     * Returns an array for the import command
     *
     * @return array
     */
    protected function getApiData()
    {
        return [
            'valid_record' => [
                'title' => 'a title',
                'email' => 'torben@derhansen.com',
                'description' => 'a description',
                'year' => 2017,
                'amount' => 19.99,
                'paid' => true
            ],
            'empty_title' => [
                'title' => '',
                'email' => 'torben@derhansen.com',
                'description' => 'a description',
                'year' => 2017,
                'amount' => 19.99,
                'paid' => true
            ],
            'description_too_short' => [
                'title' => 'a title',
                'email' => 'torben@derhansen.com',
                'description' => '12345',
                'year' => 2017,
                'amount' => 19.99,
                'paid' => true
            ],
            'email_invalid' => [
                'title' => 'a title',
                'email' => 'torben@derhansen',
                'description' => 'a description',
                'year' => 2017,
                'amount' => 19.99,
                'paid' => true
            ],
            'year_non_numeric' => [
                'title' => 'a title',
                'email' => 'torben@derhansen.com',
                'description' => 'a description',
                'year' => 'not a number - will not fail, since default value for field is "0" and property mapper casts value to int',
                'amount' => 19.99,
                'paid' => true
            ],
            'empty_record' => [
            ]
        ];
    }
}
