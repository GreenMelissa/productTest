<?php

namespace App\Form;

use App\Enum\ProductEnum;
use App\Enum\TaxNumberEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

/**
 * Форма расчета стоимости товара
 *
 * @author Daniil Ilin <daniil.ilin@gmail.com>
 */
class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product', ChoiceType::class, [
                'label' => 'Товар',
                'choices' => ProductEnum::getChoiceItems(),
            ])
            ->add('taxNumber', TextType::class, [
                'label' => 'TAX номер',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Пожалуйста, введите TAX номер',
                    ]),
                    new Regex([
                        'pattern' => '/^(' . $this->getTaxPattern() .')\d{1,}$/',
                        'message' => 'Введен некорректный TAX номер',
                    ]),
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Рассчитать стоимость',
            ])
        ;
    }

    /**
     * Создание паттерна для TAX номера
     */
    private function getTaxPattern(): string
    {
        $codes = TaxNumberEnum::getCountryCodes();
        $numItems = count($codes);
        $i = 0;
        $pattern = '';
        foreach ($codes as $code) {
            $pattern .= $code . (++$i === $numItems ? '' : '|');
        }
        return $pattern;
    }
}