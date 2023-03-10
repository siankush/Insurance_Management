<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InsurancePolicies Model
 *
 * @property \App\Model\Table\InsuranceCompaniesTable&\Cake\ORM\Association\BelongsTo $InsuranceCompanies
 *
 * @method \App\Model\Entity\InsurancePolicy newEmptyEntity()
 * @method \App\Model\Entity\InsurancePolicy newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\InsurancePolicy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InsurancePolicy get($primaryKey, $options = [])
 * @method \App\Model\Entity\InsurancePolicy findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\InsurancePolicy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InsurancePolicy[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InsurancePolicy|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InsurancePolicy saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InsurancePolicy[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InsurancePolicy[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\InsurancePolicy[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InsurancePolicy[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class InsurancePoliciesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('insurance_policies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('InsuranceCompanies', [
            'foreignKey' => 'insurance_company_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('insurance_company_id')
            ->notEmptyString('insurance_company_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        // $validator
        //     ->allowEmptyFile('image')
        //     ->notEmptyString('image', 'Please Select the image')
        //     ->add('image', [
        //         'mimeType' => [
        //             'rule' => [
        //                 'mimeType',
        //                 ['image/jpg', 'image/png', 'image/jpeg'],
        //                 'message' => 'Please upload only jpg',
        //             ],
        //             'fileSize' => [
        //                 'rule' => ['fileSize', '<=', '1MB'],
        //                 'message' => 'image',
        //             ],
        //         ]
        //     ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('insurance_company_id', 'InsuranceCompanies'), ['errorField' => 'insurance_company_id']);

        return $rules;
    }
}
